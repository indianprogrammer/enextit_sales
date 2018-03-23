<div id="content">
    <div class="container">
        <div class="row bar">
            <div id="customer-order" class="col-lg-12">
                <div class="box">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border-top-0">ID</th>
                                    <th colspan="3" class="border-top-0">Product</th>
                                    <th class="border-top-0">Unit price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product) { ?>
                                    <tr>
                                        <td><?=$product['id'] ?></td>
                                        <td><a href="#"><img src="upload/img/<?=$product['img'] ?>" alt="<?=$product['title']?>" class="img-fluid"></a></td>
                                        <td><?=$product['title']?></td>
                                        <td><?=$product['description']?></td>
                                        <td><?=$product['amount_b2c']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
