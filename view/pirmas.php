<?php require __DIR__ . '/virsus.php' ?>

<div class="container">
    <div class="row">
        <div class="col-12">
        <ul class="list-group">
<?php foreach ($summos as $summa) : ?>
<li class="saskaita list-group-item">
<h1>Saskaita Nr : LT <?= $summa['id'] ?></h1>
<form action="<?= URL ?>delete/<?= $summa['id'] ?>" method="post">
    <button type="submit" class="btn btn-danger">Uždaryti sąskaitą</button>
</form>
<h2>Sąskaitos balansas: <?= $summa['lesas'] ?></h2>
<form class="m-2" action="<?= URL ?>add-lesas/<?= $summa['id'] ?>" method="post">
    <div class="form-saskaita">
        <label>Pridėti lėšas: </label><input type="text" name="count">
        <button type="submit" class="btn btn-info">+</button>
    </div>
</form>

<form class="m-2" action="<?= URL ?>rem-lesas/<?= $summa['id'] ?>" method="post">
<div class="form-saskaita">
        <label>Atimti lėšas: </label><input type="text" name="count">
        <button type="submit" class="btn btn-info">-</button>
    </div>
</form>
</li>

<?php endforeach ?>
</ul>
</div></div></div>
<?php require __DIR__ . '/apacia.php' ?>