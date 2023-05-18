<h2><?=$logfileName?></h2>
<table>
    <thead>
        <th>Time of access</th>
        <th>IP address</th>
        <th>URL</th>
        <th>Referer address</th>
        <th>Additional information</th>
    </thead>
    <?php foreach($logInformationParsed as $logLine):?>
    <tr>
        <td><?=$logLine[0]?></td>
        <td><?=$logLine[1]?></td>
        <td><?=$logLine[2]?></td>
        <td><?=$logLine[3]?></td>
        <td><?=$logLine[4]?></td>
    </tr>
    <?php endforeach?>
</table>
<hr>
<a href=<?=BASE_URL?>>Move to main page</a>