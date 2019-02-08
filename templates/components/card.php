<div class="col-sm-4">
    <div  class="card border-secondary mb-3" style = " max-width : 18rem;">
        <img class="card-img-top" src="/assets/image/<?= $item->img ?>" alt="Card image cap">
        <div  class = "card-body">
            <h5  class = "card-title"><a href="<?= route('show',['id'=>$item->id]);?>"><b><?= $item->name ?></b></a></h5>
            <p  class = "card-text" style="color:#000080"> <?= $item->description ?></p>
        </div>
<?php if ($item->count == 0): ?>
        <div  class ="card-footer bg-transparent border-secondary"><b><?= $item->price ?></b><br><br><br><br><br><br><br></div>
<?php else: ?>
        <div  class ="card-footer bg-transparent border-secondary"><b><?= $item->price ?>
            <p>Количество:
            <p><form id="form1" name="form1" method="post"  action="<?=route('add')?>">
                <label>
                <input type="number" name="count" min="1" value="1" size="5" /></p></b>
                <input type="hidden"  name="price" value="<?=$item->price?>"  />
                <input type="hidden"  name="product_id" value="<?=$item->id?>" />
                <input type="hidden"  name="addtocart" value="addtocart" />
                <input type="submit"  name="buy" value="Купить" <?php if (!Auth::userId()) {echo 'disabled';} ?>/>
                </label>
            </form></p>
        </div>
<?php endif;?>
    </div>
</div>


