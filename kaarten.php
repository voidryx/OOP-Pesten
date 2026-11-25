<?php
class kaart {
    private $waarde;
    private $teken;

    function __construct($waarde, $teken) {
        $this->waarde = $waarde;
        $this->teken = $teken;
    }

    public function getWaarde() {
        return $this->waarde;
    }

    public function getTeken() {
        return $this->teken;
    }

    public function showkaart() {
        echo $this->waarde . " van " . $this->teken;
    }
}

class Deck {
    public $kaarten;
    private $waardes = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A");
    private $tekens = array("H", "S", "R", "K");        
    function __construct()  {
        $this->kaarten = array();
        $this->MaakNieuwDeck();
        foreach ($this->tekens as $teken) {
            foreach ($this->waardes as $waarde) {
                $this->kaarten[] = new kaart($waarde, $teken);
            }
        }
    }
    private function MaakNieuwDeck() {
        $nr=0;
        for($T=0; $T < count($this->tekens); $T++) {
            for($W=0; $W < count($this->waardes); $W++) {
                $this->kaarten[$nr] = new kaart($this->waardes[$W], $this->tekens[$T]);
                $nr++;
            }
        }
    }
    public function ShowDeck() {
        echo "<deck>";
        foreach ($this->kaarten as $kaart) {
            echo "<kaart>";
            $kaart->showkaart();
            echo "</kaart>";
        }
        echo "</deck>";
    }
}
