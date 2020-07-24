<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>Familias</span>
    </div>
    <ul>
        <?php foreach ($familias as $row) { ?>
        <li><a href="#"><?= $row->nombre ?></a></li>
        <?php } ?>

    </ul>
</div>