<h1>New patiënt</h1>
<form method="post" action="<?= URL ?>patient/createSave">
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="name">Species:</label>
        <input type="text" id="species" name="species">
    </div>
    <div>
        <label for="name">status:</label>
        <input id="status" name="status">
    </div>
    <div>
        <label for="name">owner:</label>
    </div>
    <select name='owner'>
        <?php
	foreach($owners as $owner):
?>


            <option value="<?=$owner['Firstname']?>">
                <?=$owner['Firstname']?>
            </option>

            <?php
	endforeach;
?>
    </select>
    <div>
        <label></label>
        <input type="submit" value="Save">
    </div>
</form>