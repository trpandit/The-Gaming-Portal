var game = new Phaser.Game(800, 600, Phaser.AUTO, null, {preload: preload, create: create, update: update});

var back;
var ball;
var paddle;
var bricks;
var newBrick;
var brickInfo;
var scoreText;
var score = 0;
var lives = 3;
var livesText;
var lifeLostText;
var ballOnPaddle = true;
var explosions;
var ab;
var flagab = false;
var fireButton;

var bullets;
var bullet;
var bulletTime = 0;

var big;
var flagbig = false;
var pad1;

var fa;
var flagfa = false;

function preload() {
    game.load.image('back', '../dx/starfield.jpg');
    game.load.image('paddle', '../dx/paddle.png');

    game.load.image('brick0', '../dx/brick0.png');
    game.load.image('brick1', '../dx/brick1.png');
    game.load.image('brick2', '../dx/brick2.png');
    game.load.image('brick3', '../dx/brick3.png');
    game.load.image('brick4', '../dx/brick4.png');

    game.load.image('ball', '../dx/ball.png');
    game.load.spritesheet('explo', '../dx/explosion.png', 64, 64, 23);

    game.load.image('ab', '../dx/yellow.png');
    game.load.image('bullet', '../dx/bullet.png');

    game.load.image('pad1', '../dx/pad1.png');
    game.load.image('big', '../dx/aqua_ball.png');

    game.load.image('live', '../dx/firstaid.png')
}

function create() {
    s = game.add.tileSprite(0, 0, 800, 600, 'back');


    game.physics.startSystem(Phaser.Physics.ARCADE);
    game.physics.arcade.checkCollision.down = false;

    ball = game.add.sprite(game.world.width * 0.5, game.world.height - 45, 'ball');

    ball.anchor.set(0.5);
    game.physics.enable(ball, Phaser.Physics.ARCADE);


    ball.body.collideWorldBounds = true;
    ball.body.bounce.set(1);

    ball.checkWorldBounds = true;
    ball.events.onOutOfBounds.add(ballLeaveScreen, this);

    paddle = game.add.sprite(game.world.width * 0.5, game.world.height - 30, 'paddle');
    paddle.anchor.set(0.5, 0.5);
    game.physics.enable(paddle, Phaser.Physics.ARCADE);
    paddle.body.immovable = true;

    scoreText = game.add.text(5, 5, 'Points: 0', {font: '18px Arial', fill: '#ffffff'});
    livesText = game.add.text(game.world.width - 5, 5, 'Lives: ' + lives, {font: '18px Arial', fill: '#ffffff'});
    livesText.anchor.set(1, 0);
    lifeLostText = game.add.text(game.world.width * 0.5, game.world.height * 0.5, 'Life lost, click to continue', {
        font: '18px Arial',
        fill: '#ffffff'
    });
    lifeLostText.anchor.set(0.5);
    lifeLostText.visible = false;

    initBricks();

    game.input.onDown.add(releaseBall, this);

    explosions = game.add.group();

    for (var i = 0; i < 10; i++) {
        var explosionAnimation = explosions.create(0, 0, 'explo', [0], false);
        explosionAnimation.anchor.setTo(0.5, 0.5);
        explosionAnimation.scale.set(0.7);
        explosionAnimation.animations.add('explo');
    }

    bullets = game.add.group();//Whole Group is taken as veriable
    bullets.enableBody = true;//enbles Physics
    bullets.physicsBodyType = Phaser.Physics.ARCADE;//physics mode
    bullets.createMultiple(200, 'bullet');
    bullets.setAll('anchor.x', 0.5);
    bullets.setAll('anchor.y', 1);
    bullets.setAll('outofBoundsKill', true);//free memory of out of bound bullets
    bullets.setAll('checkWorldBounds', true);//check bounds

    fireButton = game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);
}

function releaseBall() {

    if (ballOnPaddle) {
        ballOnPaddle = false;
        ball.body.velocity.y = -300;
        ball.body.velocity.x = -75;
    }
}

function update() {
    paddle.x = game.input.x;
    if (ballOnPaddle) {
        ball.body.x = paddle.x;
    }
    else {
        game.physics.arcade.collide(ball, paddle, ballHitPaddle, null, this);
        game.physics.arcade.collide(ball, bricks, ballHitBrick, null, this);
    }

    if (flagab == true) {
        game.physics.arcade.collide(ab, paddle, abHitpaddle, null, this);
        ab.y += 2;

        if (fireButton.isDown) {
            fireBullet();
        }

        game.physics.arcade.collide(bullets, bricks, bulletHitBrick, null, this);
    }

    if (flagbig == true) {
        game.physics.arcade.collide(big, paddle, bigHitpaddle, null, this);
        big.y += 2;
    }

    if (flagfa == true) {
        game.physics.arcade.collide(fa, paddle, faHitpaddle, null, this);
        fa.y += 2;
    }

}

function faHitpaddle() {
    fa.kill();
    lives++;
    livesText.setText('Lives: ' + lives);

    flagfa = false;
}

function bigHitpaddle() {
    big.kill();
    paddle.kill();

    paddle = game.add.sprite(paddle.x, paddle.y, 'pad1');
    paddle.anchor.setTo(0.5, 0.5);

    game.physics.enable(paddle, Phaser.Physics.ARCADE);
    paddle.body.immovable = true;

}

function bulletHitBrick(bullet, brick) {
    var explosionAnimation = explosions.getFirstExists(false);
    explosionAnimation.reset(brick.x, brick.y);
    explosionAnimation.play('explo', 30, false, true);

    if (brick == bricks.children[50]) {
        ab = game.add.sprite(brick.x, brick.y, 'ab');
        ab.anchor.setTo(0.5, 0.5);
        game.physics.enable(ab, Phaser.Physics.ARCADE);
        flagab = true;
    }

    if (brick == bricks.children[1]) {
        big = game.add.sprite(brick.x, brick.y, 'big');
        big.anchor.setTo(0.5, 0.5);
        game.physics.enable(big, Phaser.Physics.ARCADE);
        flagbig = true;
    }

    if (brick == bricks.children[23]) {
        fa = game.add.sprite(brick.x, brick.y, 'live');
        fa.anchor.setTo(0.5, 0.5);
        game.physics.enable(fa, Phaser.Physics.ARCADE);
        flagfa = true;
    }

    brick.kill();
    bullet.kill();

    score += 10;
    scoreText.setText('Points: ' + score);

    var count_alive = 0;
    for (var i = 0; i < bricks.children.length; i++) {
        if (bricks.children[i].alive == true) {
            count_alive++;
        }
    }
    if (count_alive == 0) {
        alert('You won the game, congratulations!');
        location.reload();
    }
}

function fireBullet() {

    if (game.time.now > bulletTime) {
        bullet = bullets.getFirstExists(false);

        if (bullet) {
            bullet.reset(paddle.x + 15, paddle.y);
            bullet.body.velocity.y = -400;
            bulletTime = game.time.now + 200;
        }
    }
}

function abHitpaddle() {
    ab.kill();
}

function initBricks() {
    brickInfo =
        {
            width: 50,
            height: 20,

            count: {
                row: 12,
                col: 5
            },

            offset: {
                top: 50,
                left: 90
            },

            padding: 5
        }
    bricks = game.add.group();

    for (var c = 0; c < brickInfo.count.col; c++) {
        for (var r = 0; r < brickInfo.count.row; r++) {
            var brickX = (r * (brickInfo.width + brickInfo.padding)) + brickInfo.offset.left;
            var brickY = (c * (brickInfo.height + brickInfo.padding)) + brickInfo.offset.top;

            switch (c) {
                case 0:
                    newBrick = game.add.sprite(brickX, brickY, 'brick0');
                    break;

                case 1:
                    newBrick = game.add.sprite(brickX, brickY, 'brick1');
                    break;

                case 2:
                    newBrick = game.add.sprite(brickX, brickY, 'brick2');
                    break;

                case 3:
                    newBrick = game.add.sprite(brickX, brickY, 'brick3');
                    break;

                case 4:
                    newBrick = game.add.sprite(brickX, brickY, 'brick4');
                    break;
            }
            game.physics.enable(newBrick, Phaser.Physics.ARCADE);

            newBrick.body.immovable = true;
            newBrick.anchor.set(0.5);
            bricks.add(newBrick);
        }
    }
}

function ballHitBrick(ball, brick) {
    var explosionAnimation = explosions.getFirstExists(false);
    explosionAnimation.reset(brick.x, brick.y);
    explosionAnimation.play('explo', 30, false, true);

    if (brick == bricks.children[50]) {
        ab = game.add.sprite(brick.x, brick.y, 'ab');
        ab.anchor.setTo(0.5, 0.5);
        game.physics.enable(ab, Phaser.Physics.ARCADE);
        flagab = true;
    }

    if (brick == bricks.children[1]) {
        big = game.add.sprite(brick.x, brick.y, 'big');
        big.anchor.setTo(0.5, 0.5);
        game.physics.enable(big, Phaser.Physics.ARCADE);
        flagbig = true;
    }

    if (brick == bricks.children[23]) {
        fa = game.add.sprite(brick.x, brick.y, 'live');
        fa.anchor.setTo(0.5, 0.5);
        game.physics.enable(fa, Phaser.Physics.ARCADE);
        flagfa = true;
    }

    brick.kill();

    score += 10;
    scoreText.setText('Points: ' + score);

    var count_alive = 0;
    for (var i = 0; i < bricks.children.length; i++) {
        if (bricks.children[i].alive == true) {
            count_alive++;
        }
    }
    if (count_alive == 0) {
        alert('You won the game, congratulations!');

        location.href = "../php/dx.php?scr=" + score;

    }
}

function ballLeaveScreen() {
    lives--;

    if (lives) {
        livesText.setText('Lives: ' + lives);

        lifeLostText.visible = true;

        paddle.reset(game.world.width * 0.5, game.world.height - 30);
        ball.reset(paddle.x - 15, paddle.y - 15);

        game.input.onDown.addOnce(function () {
            lifeLostText.visible = false;
            ball.body.velocity.set(300, -300);
        }, this);
    }
    else {
        alert('You lost, game over!');

        location.href = "../php/dx.php?scr=" + score;
        //location.reload();
    }
}


function ballHitPaddle(ball, paddle) {

    var diff = 0;

    if (ball.x < paddle.x) {
        diff = paddle.x - ball.x;
        ball.body.velocity.x = (-10 * diff);
    }
    else if (ball.x > paddle.x) {
        diff = ball.x - paddle.x;
        ball.body.velocity.x = (10 * diff);
    }
    else {
        ball.body.velocity.x = 2 + Math.random() * 8;
    }
}

   
