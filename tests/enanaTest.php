<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {
    
    public function testCreandoEnana() {
         // Crear enana viva
     // Crear enana viva
$enanaViva = new Enana("Enana1", 50);
$this->assertEquals("Enana1", $enanaViva->getNombre());
$this->assertEquals(50, $enanaViva->getPuntosVida());
$this->assertEquals("viva", $enanaViva->getSituacion());

// Crear enana muerta
$enanaMuerta = new Enana("Enana2", -10);
$this->assertEquals("Enana2", $enanaMuerta->getNombre());
$this->assertEquals(-10, $enanaMuerta->getPuntosVida());
$this->assertEquals("muerta", $enanaMuerta->getSituacion());

// Crear enana en limbo
$enanaLimbo = new Enana("Enana3", 0);
$this->assertEquals("Enana3", $enanaLimbo->getNombre());
$this->assertEquals(0, $enanaLimbo->getPuntosVida());
$this->assertEquals("limbo", $enanaLimbo->getSituacion());
    
    }
    public function testHeridaLeveVive() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva
        $enana = new Enana("EnanaTest", 20);
        $enana->heridaLeve();
        $this->assertGreaterThan(0, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());
    }

    public function testHeridaLeveMuere() {
      /*   $enana = new Enana("EnanaTest", 5);
        $enana->heridaLeve();
        $this->assertLessThan(0, $enana->getPuntosVida());
        $this->assertEquals("muerta", $enana->getSituacion()); */
    }


    public function testHeridaGrave() {
        $enana = new Enana("EnanaTest", 10);
        $enana->heridaGrave();
        $this->assertEquals(0, $enana->getPuntosVida());
        $this->assertEquals("limbo", $enana->getSituacion());
    }
    public function testPocimaRevive() {
        $enana = new Enana("EnanaTest", -5);
        $enana->pocima();
        $this->assertEquals(20, $enana->getPuntosVida());
        $this->assertEquals("muerta", $enana->getSituacion());
    }
    
    public function testPocimaNoRevive() {
        $enana = new Enana("EnanaTest", 0);
        $enana->pocima();
        $this->assertEquals(20, $enana->getPuntosVida());
        $this->assertEquals("limbo", $enana->getSituacion());
    }
    
    public function testPocimaExtraLimbo() {
        $enana = new Enana("EnanaTest", 0);
        $enana->pocimaExtra();
        $this->assertEquals(20, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());
    }
}
?>