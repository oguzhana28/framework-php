<h1>Edit specie</h1>
<form method="post">
    <div>
        <input type="hidden" name="id" value="<?=$specie['id'];?>">
        <label for="name">Specie:</label>
        <input type="text" id="Specie" name="Specie" value="<?=$specie['Specie']?>">
    </div>
    <div>
        <label></label>
        <input type="submit" value="Save">
    </div>
</form>