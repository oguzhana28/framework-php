<h1>Edit cliënt</h1>
<form method="post">
    <div>
        <input type="hidden" name="id" value="<?=$client['id'];?>">
        <label for="name">Firstname:</label>
        <input type="text" id="Firstname" name="Firstname" value="<?=$client['Firstname']?>">
    </div>
    <div>
        <label for="name">Prefix:</label>
        <input type="text" id="prefix" name="prefix" value="<?=$client['prefix']?>">
    </div>
    <div>
        <label for="name">Lastname:</label>
        <input id="Lastname" name="Lastname" value="<?=$client['Lastname']?>">
    </div>
    <div>
        <label></label>
        <input type="submit" value="Save">
    </div>
</form>