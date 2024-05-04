<?php

ob_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

require __DIR__ . "/vendor/autoload.php";

use Src\Core\Session;
use CoffeeCode\Router\Router;

$session = new Session();
$router = new Router(url());

$router->namespace("Src\Controllers");

/**
 * WEB
 */
$router->group(null);
$router->get("/", "Web:home", "web.home");
$router->get("/termos-de-uso", "Web:terms", "web.terms");
$router->get("/politica-de-privacidade", "Web:privacyPolicy", "web.privacyPolicy");
$router->get("/regulamento", "Web:regulation", "web.regulation");
$router->get("/login", "Web:login", "web.login");
$router->post("/login", "Web:login", "web.login");

$router->get("/site", "Web:site", "web.site");
$router->get("/acao/{id}", "Web:action", "web.action");
$router->get("/checkout/{id}", "Web:actionCheckout", "web.actionCheckout");

/**
 * WEB POST ROUTES
 */
$router->post("/cadastrar", "Web:subscribe", "web.subscribe");
$router->post("/cidades", "Web:cities", "web.cities");
$router->post("/recuperar-numero", "Web:subscription", "web.subscription");

$router->namespace("Src\Controllers\Web");

/**
 * NEWSLETTER
 */
$router->post("/newsletter/cadastrar", "Newsletter:add", "newsletter.add");

/**
 * ACTIONS
 */
$router->post("/action/costumer", "Action:costumer", "action.costumer");
$router->post("/action/{id}/buy", "Action:buy", "action.buy");
$router->post("/action/{id}/check-payment", "Action:checkPayment", "action.checkPayment");
$router->post("/action/payment/return", "Action:paymentReturn", "action.paymentReturn");

$router->namespace("Src\Controllers");

/**
 * ADMIN
 */
$router->group("/adm");
$router->get("/", "Admin:home", "admin.home");
$router->get("/acoes", "Admin:actions", "admin.actions");
$router->get("/acao/{id}", "Admin:action", "admin.action");
$router->get("/acoes/nova-acao", "Admin:newAction", "admin.newAction");
$router->get("/acoes/editar/{id}", "Admin:editAction", "admin.editAction");
$router->get("/clientes", "Admin:costumers", "admin.costumers");
$router->get("/clientes/{id}", "Admin:costumer", "admin.costumer");
$router->get("/newsletter", "Admin:newsletter", "admin.newsletter");
$router->get("/transacoes", "Admin:transactions", "admin.transactions");
$router->get("/perfil", "Admin:profile", "admin.profile");
$router->post("/perfil", "Admin:profile", "admin.profile");
$router->get("/usuarios", "Admin:users", "admin.users");
$router->get("/acao/{id}/sortear", "Admin:prizeDraw", "admin.prizeDraw");
$router->get("/logout", "Admin:logout", "admin.logout");

$router->namespace("Src\Controllers\Admin");

/**
 * ACTIONS
 */
$router->post("/acoes/adicionar", "Action:add", "action.add");
$router->post("/acoes/deletar/{id}", "Action:delete", "action.delete");
$router->post("/acoes/dados/{id}", "Action:data", "action.data");
$router->post("/acoes/imagens/adicionar/principal", "Action:addMainImage", "action.addMainImage");
$router->post("/acoes/imagens/remover/principal", "Action:removeMainImage", "action.removeMainImage");
$router->post("/acoes/imagens/remover/principal/{id}", "Action:removeMainImageAction", "action.removeMainImageAction");
$router->post("/acoes/imagens/adicionar/galeria", "Action:addImages", "action.addImages");
$router->post("/acoes/imagens/remover/galeria", "Action:removeGalleryImage", "action.removeGalleryImage");
$router->post("/acoes/ebook/remover/{id}", "Action:removeEbook", "action.removeEbook");
$router->post("/acoes/sortear-ganhador/{id}", "Action:getWinner", "action.getWinner");
$router->post("/acoes/definir-ganhador/{id}", "Action:setWinner", "action.setWinner");

/**
 * CLIENTS
 */
$router->post("/clientes/adicionar", "Costumers:add", "costumers.add");
$router->post("/clientes/deletar/{id}", "Costumers:delete", "costumers.delete");
$router->post("/clientes/dados/{id}", "Costumers:data", "costumers.data");
$router->get("/clientes/exportar", "Costumers:export", "costumers.export");

/**
 * USERS
 */
$router->post("/usuarios/adicionar", "Users:add", "users.add");
$router->post("/usuarios/deletar/{id}", "Users:delete", "users.delete");
$router->post("/usuarios/dados/{id}", "Users:data", "users.data");

/**
 * ROUTE PROCESS
 */
$router->dispatch();

ob_end_flush();