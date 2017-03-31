<h1>New cliënt</h1>
<form method="post" action="<?= URL ?>client/createSave">
    <div>
        <label for="name">Firstname:</label>
        <input type="text" id="Firstname" name="Firstname">
    </div>
    <div>
        <label for="name">Prefix:</label>
        <input type="text" id="prefix" name="prefix">
    </div>
    <div>
        <label for="name">Lastname:</label>
        <input id="Lastname" name="Lastname">
    </div>
    <div>
        <label></label>
        <input type="submit" value="Save">
    </div>
</form>