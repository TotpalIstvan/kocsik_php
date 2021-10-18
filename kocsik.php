<!DOCTYPE html> 
<html>
    <link rel="stylesheet" href = "main.css" type = text/css>
    <title>HTML Tutorial</title>
    <body>
        <h1>Autók</h1>
        <?php 


        $conn = new PDO("mysql:host=localhost;dbname=autoadatbazis;charset=utf8", "root", "");

        $auto1 = new Auto(
            4,1991,115,175,10.7
        );
       // $auto1->henger_szam = 4;
       // $auto1->henger_terfogat = 1991;
       // $auto1->teljesitmeny = 115;
       // $auto1->max_sebesseg = 175;
       // $auto1->fogyasztas = 10.7;
        $auto1->autoKiir();
        $auto1 -> hozzaAd();
        
        $auto2 = new Auto(
            4,1982,133,195,11.9
        );
        //$auto2->henger_szam = 4;
        //$auto2->henger_terfogat = 1982;
        //$auto2->teljesitmeny = 133;
        //$auto2->max_sebesseg = 195;
        //$auto2->fogyasztas = 11.9;
        $auto2 -> autoKiir();
        $auto2 -> hozzaAd();
        ?>
      
    </body>
</html>
<?php


class Auto{
    public $henger_szam = 0;
    public $henger_terfogat = 0;
    public $teljesitmeny = 0;
    public $max_sebesseg = 0;
    public $fogyasztas = 0;
    private $conn;

    public function __construct($henger_szam,$henger_terfogat,
    $teljesitmeny,$max_sebesseg,$fogyasztas) {

            $this->henger_szam = $henger_szam;
            $this->henger_terfogat = $henger_terfogat;
            $this->teljesitmeny = $teljesitmeny;
            $this->max_sebesseg = $max_sebesseg;
            $this->fogyasztas = $fogyasztas;
            $this->conn = new PDO("mysql:host=localhost;dbname=autoadatbazis;charset=utf8", "root", "");
    }

    public function hozzaAd() {
        $this->conn->query("INSERT INTO autok
        (HengerSzam,HengerTerfogat, Teljesitmeny, MaxSebesseg, Fogyasztas)
        VALUES({$this->henger_szam},
        {$this->henger_terfogat},
        {$this->teljesitmeny},
        {$this->max_sebesseg},
        {$this->fogyasztas})");
    }

    public function autoKiir() {
        echo "
            <div class='card'>
                <img src='unnamed.jpg'>
            <table>
                <tr> 
                    <th>Hengerek száma</th>
                    <th>Hengertérfogat</th>
                    <th>Teljesítmény</th>
                    <th>Maximális sebesség</th>
                    <th>Fogyasztás</th>
                </tr>

                <tr>
                    <td>{$this->henger_szam}</td>
                    <td>{$this->henger_terfogat}</td>
                    <td>{$this->teljesitmeny}</td>
                    <td>{$this->max_sebesseg}</td>
                    <td>{$this->fogyasztas}</td>
                </tr>
            </table>
        </div>
        ";
   }
    
}


?>