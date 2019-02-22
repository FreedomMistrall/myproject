<?php
include_once 'header.php';
include_once 'navbar.php';
?>

<div class="content">
    <div class="container">
        <div class="single">
            <div class="col-md-9 top-in-single">
                <div class="col-md-5 single-top">
                    <ul id="etalage">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="/assets/image/<?= $item->img ?>" alt="First slide">
                                </div>
                                <?php foreach ($images as $image) : ?>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/assets/image/<?= $image['image'] ?>" alt="Second slide">
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </ul>
                </div>
                <div class="col-md-7 single-top-in">
                    <div class="single-para">
                        <h4><?= $item->name ?></h4>
                        <p><?=$item->description ?></p>

                        <p><label  class="add-to"><b><?= $item->price ?> грн.</b></label></p>
                        <div class="quantity">
                            <input type="number" min="1" value="1" size="4" />
                        </div>
                        <a data-id ="<?=$item->id?>" class="cart" href="<?= route('add', ['id'=>$item->id]) ?>">Купить</a>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <!----- tabs-box ---->
                <div class="sap_tabs">
                    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                        <ul class="resp-tabs-list">

                            <div class="clearfix"></div>
                        </ul>
                        <div class="resp-tabs-container">
                            <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Product Description</h2>
                            <div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
                                <div class="facts">
                                    <p ><?=$item->fullDescription ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
