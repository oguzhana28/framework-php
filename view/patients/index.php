<h1>Patiënts</h1>
<p class="options"><a href="create">create</a></p>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Species</th>
            <th>Owner</th>
            <th>Status</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    </tbody>
    <?php
	foreach($patients as $patient):
?>
        <tr>
            <td>
                <?=$patient['name']?>
            </td>
            <td>
                <?=$patient['species']?>
            </td>
            <td>
                <?=$patient['owner']?>
            </td>
            <td>
                <?=$patient['status']?>
            </td>
            <td class="center"><a href="edit/?id=<?=$patient['id']?>">edit</a></td>
            <td class="center"><a href="delete/?id=<?=$patient['id']?>">delete</a></td>
        </tr>

        <?php
	endforeach;
?>
            <li><a href="<?= URL ?>home/index">home</a></li>
            </tbody>
</table>