import { Component, OnInit } from '@angular/core';
import { ObjectParamService } from '../../object-param.service';
import { DomSanitizer } from '@angular/platform-browser';
import { StreamingMedia, StreamingVideoOptions } from '@ionic-native/streaming-media/ngx';
import { File } from '@ionic-native/file/ngx';
import { FileTransfer, FileTransferObject } from '@ionic-native/file-transfer/ngx';
import { AndroidPermissions } from '@ionic-native/android-permissions/ngx';

@Component({
  selector: 'app-lesson-details',
  templateUrl: './lesson-details.page.html',
  styleUrls: ['./lesson-details.page.scss'],
})
export class LessonDetailsPage implements OnInit {

  lesson;
  constructor(private androidPermissions: AndroidPermissions, private file: File, private transfer: FileTransfer, private streamingMedia: StreamingMedia, private objParam: ObjectParamService, private sanitizer: DomSanitizer) {
    this.lesson = this.objParam.getParam();
    console.log(this.objParam.getParam());
  }

  sanitize() {
      return this.sanitizer.bypassSecurityTrustHtml(this.lesson.body) ;
  }

  playVid(){
    let options: StreamingVideoOptions = {
      successCallback: () => { console.log('Video played') },
      errorCallback: (e) => { console.log('Error streaming') },
      orientation: 'landscape',
      shouldAutoClose: true,
      controls: false
    };
    
    this.streamingMedia.playVideo(this.lesson.video_link, options);
  }

  downVid() {
    this.androidPermissions.hasPermission(this.androidPermissions.PERMISSION.READ_EXTERNAL_STORAGE)
      .then(status => {
        if (status.hasPermission) {
          this.downloadFileVid();
        } 
        else {
          this.androidPermissions.requestPermission(this.androidPermissions.PERMISSION.READ_EXTERNAL_STORAGE)
            .then(status => {
              if(status.hasPermission) {
                this.downloadFileVid();
              }
            });
        }
      });
  }

  getPermission() {
    this.androidPermissions.hasPermission(this.androidPermissions.PERMISSION.READ_EXTERNAL_STORAGE)
      .then(status => {
        if (status.hasPermission) {
          this.downloadFile();
        } 
        else {
          this.androidPermissions.requestPermission(this.androidPermissions.PERMISSION.READ_EXTERNAL_STORAGE)
            .then(status => {
              if(status.hasPermission) {
                this.downloadFile();
              }
            });
        }
      });
  }
  
  async downloadFileVid() {
    let vidPath = this.lesson.video_link;
    let filePath = this.file.externalRootDirectory + 'download/' + this.lesson.lesson_title + '.mp4'
    const fileTransfer: FileTransferObject = this.transfer.create();
    let uri = encodeURI(decodeURIComponent(vidPath));
  
    // Downloading the file
    fileTransfer.download(uri, filePath, true).then(()=>{
      alert("Successfully downloaded : " + uri + " to " + filePath);
    })
  }

  async downloadFile() {
    let pdfPath = this.lesson.pdf_link;
    let filePath = this.file.externalRootDirectory + 'download/' + this.lesson.lesson_title + '.pdf'
    const fileTransfer: FileTransferObject = this.transfer.create();
    let uri = encodeURI(decodeURIComponent(pdfPath));
  
    // Downloading the file
    fileTransfer.download(uri, filePath, true).then(()=>{
      alert("Successfully downloaded : " + uri + " to " + filePath);
    })
  }

  ngOnInit() {
    
  }

}
