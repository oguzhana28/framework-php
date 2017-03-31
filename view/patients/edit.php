<h1>Edit patiënt</h1>
<form method="post">
    <div>
        <input type="hidden" name="id" value="<?=$patient['id'];
                                              var_dump($patient);?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?=$patient['name']?>">
    </div>
    <div>
        <label for="name">Species:</label>
        <input type="text" id="species" name="species" value="<?=$patient['species']?>">
    </div>
    <div>
        <label for="name">status:</label>
        <input id="status" name="status" value="<?=$patient['status']?>">
    </div>
    <div>
        <label></label>
        <input type="submit" value="Save">
    </div>
</form>