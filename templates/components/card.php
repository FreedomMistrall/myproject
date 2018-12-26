<div class="col-sm-4">
    <div  class="card border-secondary mb-3" style = " max-width : 18rem;">
            <img class="card-img-top" src="<?= $item['img']?>" alt="Card image cap">
            <div  class = "card-body">
                <h5  class = "card-title"><a href="index.php?id=<?= $item['id']?>" <b><?= $item ['name']?></b></a></h5>
                <p  class = "card-text" style="color:#000080"> <?= $description ?></p>
            </div>
            <div  class ="card-footer bg-transparent border-secondary"><b>Цена:<?= $item['priceDisc'] ?> 
            <p>Количество: <input type="text"/></p>
            <p><input type="button" name="submit" value="Купить"/></p></b>
            </div>
    </div>
</div>


