<?php

namespace xLink\Tests\Game;

use xLink\Poker\Client;
use xLink\Poker\Game\Action;
use xLink\Poker\Game\Chips;
use xLink\Poker\Game\Player;

class ActionTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function can_create_action_for_check()
    {
        $client = Client::register('xLink');
        $player = Player::fromClient($client);

        $action = new Action($player, Action::CHECK);
        $this->assertInstanceOf(Action::class, $action);
        $this->assertEquals('xLink has checked.', $action->toString());
    }

    /** @test */
    public function can_create_action_for_call()
    {
        $client = Client::register('xLink');
        $player = Player::fromClient($client);

        $action = new Action($player, Action::CALL, Chips::fromAmount(250));
        $this->assertInstanceOf(Action::class, $action);
        $this->assertEquals('xLink has called 250.', $action->toString());
    }

    /** @test */
    public function can_create_action_for_raise()
    {
        $client = Client::register('xLink');
        $player = Player::fromClient($client);

        $action = new Action($player, Action::RAISE, Chips::fromAmount(999));
        $this->assertInstanceOf(Action::class, $action);
        $this->assertEquals('xLink has raised 999.', $action->toString());
    }

    /** @test */
    public function can_create_action_for_fold()
    {
        $client = Client::register('xLink');
        $player = Player::fromClient($client);

        $action = new Action($player, Action::FOLD);
        $this->assertInstanceOf(Action::class, $action);
        $this->assertEquals('xLink has folded.', $action->toString());
    }

    /** @test */
    public function can_create_action_for_allin()
    {
        $client = Client::register('xLink');
        $player = Player::fromClient($client);

        $action = new Action($player, Action::ALLIN, Chips::fromAmount(2453));
        $this->assertInstanceOf(Action::class, $action);
        $this->assertEquals('xLink has pushed ALL IN (2453).', $action->toString());
    }

    /** @test */
    public function can_create_action_for_sb()
    {
        $client = Client::register('xLink');
        $player = Player::fromClient($client);

        $action = new Action($player, Action::SB, Chips::fromAmount(25));
        $this->assertInstanceOf(Action::class, $action);
        $this->assertEquals('xLink has posted Small Blind (25).', $action->toString());
    }

    /** @test */
    public function can_create_action_for_bb()
    {
        $client = Client::register('xLink');
        $player = Player::fromClient($client);

        $action = new Action($player, Action::BB, Chips::fromAmount(50));
        $this->assertInstanceOf(Action::class, $action);
        $this->assertEquals('xLink has posted Big Blind (50).', $action->toString());
    }
}