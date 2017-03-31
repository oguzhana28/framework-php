<h1>Specie</h1>
<p class="options"><a href="create">create</a></p>
<table>
    <thead>
        <tr>
            <th>Specie</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    </tbody>
    <?php
	foreach($species as $specie):
?>
        <tr>
            <td>
                <?=$specie['Specie']?>
            </td>
            <td class="center"><a href="edit/?id=<?=$specie['id']?>">edit</a></td>
            <td class="center"><a href="delete/?id=<?=$specie['id']?>">delete</a></td>
        </tr>

        <?php
	endforeach;
?>
            <li><a href="<?= URL ?>home/index">home</a></li>
            </tbody>
</table>