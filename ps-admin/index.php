<?php
$file = '../assets/data/data.yml';
// Öffnet die Datei, um den vorhandenen Inhalt zu laden
$current = file_get_contents($file);
// Fügt eine neue Person zur Datei hinzu
$current .= "\nnewContent: John Smith\n";
// Schreibt den Inhalt in die Datei zurück
file_put_contents($file, $current);
?>