<h1>Cliënt</h1>
<p class="options"><a href="create">create</a></p>
<table>
    <thead>
        <tr>
            <th>Firstname</th>
            <th>prefix</th>
            <th>Lastname</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    </tbody>
    <?php
	foreach($clients as $client):
?>
        <tr>
            <td>
                <?=$client['Firstname']?>
            </td>
            <td>
                <?=$client['prefix']?>
            </td>
            <td>
                <?=$client['Lastname']?>
            </td>
            <td class="center"><a href="edit/?id=<?=$client['id']?>">edit</a></td>
            <td class="center"><a href="delete/?id=<?=$client['id']?>">delete</a></td>
        </tr>

        <?php
	endforeach;
?>
            <li><a href="<?= URL ?>home/index">home</a></li>
            </tbody>
</table>