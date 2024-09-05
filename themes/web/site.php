<?php $this->layout("web/_theme-site", $this->data()); ?>

<?php $this->start("styles"); ?>
<?php $this->end(); ?>

<section class="main-banner">
    <div class="container">
        <div class="row">
            <div class="col wow fadeInDown" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.1s">
                <img src="<?= asset("images/show-logo.png"); ?>">
            </div>
        </div>
    </div>
</section>

<section class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-auto wow fadeInLeft" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.1s">
                <h4>Fique por dentro!</h4>
                <p>Se inscreva em nossa Newsletter e seja<br> informado a cada nova ação!</p>
            </div>
            <div class="col d-flex flex-column justify-content-center wow fadeInRight" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.1s">
                <form action="<?= $router->route("newsletter.add"); ?>" method="post" class="newsletter-form">
                    <?= csrf_input(); ?>
                    <div class="row align-items-center">
                        <div class="form-group col-md-5">
                            <input type="text" name="newsletter-name" class="form-control" placeholder="Seu Nome">
                        </div>
                        <div class="form-group col-md-5">
                            <input type="text" name="newsletter-whatsapp" class="form-control input-phone" placeholder="Seu Whatsapp">
                        </div>
                        <div class="form-group col-md-2">
                            <button class="btn btn-success" type="submit">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="prizes">
    <div class="container">
        <div class="row mb-4">
            <div class="section-title white col">
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="col">
                        <h3>Ações Ativas</h3>
                        <p>Participe agora de uma ação e cruze os dedos, você pode ser o próximo sortudo!</p>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($active_actions): ?>
            <div class="row wow fadeInUp d-flex" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.1s">
                <?php foreach ($active_actions as $action): ?>
                    <div class="col-md-12 col-sm-12 col-lg-6 col-12 d-flex align-items-stretch">
                        <div class="prize-box shadow-lg w-100">
                            <a href="<?= $router->route("web.action", ["id" => $action->id]); ?>">
                                <img src="<?= (!empty($action->image) ? $action->image : url("shared/images/avatar-default.png")); ?>" alt="<?= $action->title; ?>">
                                <div class="prize-description">
                                    <h6><?= $action->title; ?></h6>
                                    <p><?= date("d/m/Y \à\s H:m", strtotime($action->end_at)); ?></p>
                                </div>
                            </a>
                            <?php if ($action->status == 1): ?>
                                <a href="<?= $router->route("web.action", ["id" => $action->id]); ?>" class="btn-action-buy pulse-effect"><?= ($action->type == 1 ? "Comprar Agora" : "Participar"); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
        <?php endif; ?>
    </div>
</section>

<?php $this->insert(CONF_VIEW_WEB . "/widgets/how-join", ["color" => "dark"]); ?>

<section class="winners">
    <div class="container">
        <div class="row mb-4">
            <div class="section-title white col">
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-trophy-alt"></i>
                    </div>
                    <div class="col">
                        <h3>Sortudos</h3>
                        <p>Conheça os últimos ganhadores!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex flex-row flex-wrap align-items-center justify-content-center">
            <?php if ($winners): ?>
                <?php foreach ($winners as $action): ?>
                    <div class="winner-box wow fadeInRight" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="<?= $router->route("web.action", ["id" => $action->id]); ?>">
                            <img src="<?= (!empty($action->image) ? $action->image : url("shared/images/avatar-default.png")); ?>" alt="<?= $action->getWinner()->name; ?>">
                            <div class="winner-info card shadow-lg p-1">
                                <h6 class="my-0"><?= $action->getWinner()->name; ?></h6>
                                <p class="d-block text-muted mb-0">Ganhador <strong><?= $action->title; ?></strong></p>
                                <div class="w-100 text-end">
                                    <span class="quota-num badge badge-info">Cota: <?= ($action->winner_quota); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-white">Nenhum ganhador até o momento! Você poderá ser o primeiro, PARTICIPE!</p>
            <?php endif; ?>
        </div>
    </div>
</section>
