<?php
$title = 'ASLCN';
require('html.php');
require('template.php'); 
?>


<table class="table-responsive">
    <thead>
        <th>Nom</th>
        <th>Présent</th>
        <th>Absent</th>
    </thead>
    <tbody>
        <tr>
            <td>4 gars 1 fille</td>
        </tr>
        <tr>
            <td>Antho</td>
            <td class="presence"><img src="public/images/icons/check.png" alt="check_icon"></td>
            <td class="absence"><img src="public/images/icons/check.png" alt="check_icon"></td>
        </tr>
            <td>16</td>
            <td>13</td>
            <td>11</td>
            <td>9</td>
            <td>7</td>
            <td>6</td>
            <td>5</td>
            <td>2</td>
            <td>0</td>
        </tr>
    </tbody>
</table>

<script src="/aslcn/public/js/presence.js"></script>