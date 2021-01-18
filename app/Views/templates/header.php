<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> VotRank Website </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Kevin Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>" />
    <!-- Dwight Custom CSS -->
    <link rel="stylesheet" href=" <?php echo base_url('public/css/backgroundStyle.css') ?>  ">
    <link rel="stylesheet" href=" <?php echo base_url('public/css/headerBodyFooterStyle.css') ?>  ">
    <link rel="stylesheet" href=" <?php echo base_url('public/css/indexStyle.css') ?>  ">
    <link rel="stylesheet" href=" <?php echo base_url('public/css/creationVotePageStyle.css') ?>  ">
    <link rel="stylesheet" href=" <?php echo base_url('public/css/votePageStyle.css') ?>  ">
    <link rel="stylesheet" href=" <?php echo base_url('public/css/premiumPagesStyle.css') ?>  ">
    <link rel="stylesheet" href=" <?php echo base_url('public/css/userPagesStyle.css') ?>  ">
    <link rel="stylesheet" href=" <?php echo base_url('public/css/signInAndLoginStyle.css') ?>  ">
    <link rel="stylesheet" href=" <?php echo base_url('public/css/paymentStyles.css') ?>  ">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('public/') ?>">Vot'Rank</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?= base_url('public/home/premium') ?>" class="nav-link">Tarification</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('public/login') ?>" class="nav-link">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('public/register') ?>" class="nav-link">Créer un compte</a>
                </li>
            </ul>
        </div>
    </nav>