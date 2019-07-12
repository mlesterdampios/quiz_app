import { Component } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  slides;
  constructor(){
    this.slides = [
      'Agueda Esteban.jpg',
      'Andres Bonifacio.jpg',
      'Antonio Luna.jpg',
      'Apolinario Mabini.jpg',
      'Arellano Cayetano.jpg',
      'Artemio Ricarte.jpg',
      'Diego Silang.jpg',
      'Emilio Aguinaldo.jpg',
      'Emilio Jacinto.jpg',
      'Epifano De los Santos.jpg',
      'Felipe Agoncillo.jpg',
      'Felipe Calderon.jpg',
      'Fernando Maria Guerrero.jpg',
      'Francisco Baltazar.jpg',
      'Francisco Dagohoy.jpg',
      'Francisco Macabulos.jpg',
      'Gabriella Silang.jpg',
      'Galicano Apacible.jpg',
      'Gliceria Marella de Villavicencio.jpg',
      'Gregoria de Jesus.jpg',
      'Gregorio del Pilar.jpg',
      'Isabelo delos Reyes.jpg',
      'Jacinto Zamora.jpg',
      'Jose abad Santos.jpg',
      'Jose Burgos.jpg',
      'Jose Calugas.jpg',
      'Jose Ignacio.jpg',
      'Jose Maria Panganiban.jpg',
      'Jose Palma.jpg',
      'Jose Rizal.jpg',
      'Juan Luna.jpg',
      'Julian Felipe.jpg',
      'Lapu Lapu.jpg',
      'Leonor Rivera.jpg',
      'Macario Sakay.jpg',
      'Marcela Agoncillo.jpg',
      'Mariano Gomez.jpg',
      'Mariano Ponce.jpg',
      'Marina Dizon.jpg',
      'Melchora Aquino.jpg',
      'Miguel  Malvar.jpg',
      'Nieves Fernandez.jpg',
      'Panday Pira.jpg',
      'Pedro Paterno.jpg',
      'Rafael Palma.jpg',
      'Simeon Ola.jpg',
      'Teresa Magbanua.jpg',
      'Thirteen Martyrs.jpg',
      'Vicente Lim.jpg'
    ];
  }
}
