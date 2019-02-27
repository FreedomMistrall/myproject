<div class="col-sm-4">
    <div  class="card border-secondary mb-3" style = " max-width : 18rem;">
        <img class="card-img-top" src="/assets/image/<?= $item->image?>" alt="Card image cap">
        <div  class = "card-body">
            <h5  class = "card-title"><a href="<?= route('product',['id'=>$item->id]);?>"><b><?= $item->name ?></b></a></h5>
            <p  class = "card-text" style="color:#000080"> <?= $item->description ?></p>
        </div>
<?php if ($item->count == 0): ?>
        <div  class ="card-footer bg-transparent border-secondary"><b><?= 'Нет в наличии' ?></b><br><br><br></div>
<?php else: ?>
            <div  class ="card-footer bg-transparent border-secondary">
                <b><?= $item->price ?> грн.</b>
                <a data-id ="<?=$item->id?>" class="cart" href="<?= route('add', ['id'=>$item->id]) ?>">Купить</a>
            </div>
<?php endif;?>
    </div>
</div>




