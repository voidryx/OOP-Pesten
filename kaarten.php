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
        echo '<img src="img/' . $this->teken . $this->waarde . '.svg" alt="' . $this->waarde . ' van ' . $this->teken . '">';
    }
}

class Deck {
    public $kaarten;
    private $waardes = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A");
    private $tekens = array("H", "S", "R", "K");        
    function __construct()  {
        $this->kaarten = array();
        $this->MaakNieuwDeck();
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
    public function rapen() {
        if (empty($this->kaarten)) {
            throw new UnderflowException("Er zitten geen kaarten meer in het deck.");
        }

        return array_shift($this->kaarten);
    }
    public function schudden() {
        shuffle($this->kaarten);
        shuffle($this->kaarten);
    }
}

class hand {

    private $Kaarten;
    private $spelernr;
    public function __construct($spelernr) {
        $this->spelernr = $spelernr;
        $this->Kaarten = array();
    }
    public function ToevoegenAanHand($kaart) {
        array_push($this->Kaarten, $kaart);
    }

    public function getAantalKaarten() {
        return count($this->Kaarten);
    }

    public function showhand() {
        echo "<hand class='p" . $this->spelernr . "'>";
        foreach ($this->Kaarten as $kaart) {
            echo "<kaart>";
            $kaart->showkaart();
            echo "</kaart>";
        }
        echo "</hand>";
    }
}