<?php
ini_set('max_execution_time', 3000);

use CR\Api;

require '../vendor/autoload.php';

$token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MjQzLCJpZGVuIjoiNDQxNDE2NjgxNDIwNjE5Nzc3IiwibWQiOnt9LCJ0cyI6MTUyNzcxODY5MDc0MH0.gBBA3WLQIKiWkXjisu5EbSG1eJ0c80yhlUZzETOZ7gY";
$api   = new Api($token, 600);


try {

    $test = array(
        "PJLY8Q9R", "2C90YV", "VYCCJ8Q", "P8RV99Q0", "2YGQVGQ9", "V992G8P", "2LJ0ULYCC", "8CJ0LU", "V98Q9UC",
        "YRLULLLP", "L8JQYUC8", "80CU0PJG", "PQLLC0VG", "2CQ0P0L02", "G9GPJLYL", "L9UY9U9L", "PJL0YPUR", "2222CCUV2",
        "22PRYYLYQ", "2UYQPCGJ", "PC2V9GLG", "20PPQPGPG", "YRGJQ82Y", "2RUUVU", "LPVYQ0QR", "2GUQCV", "809C9UQJU",
        "2QQJYRCJ", "VQPJRL0", "82JLPL90", "8G888PVL", "20PP99QY", "8UCC9Q", "8PU2C8", "URCPPJG", "RRJQPG9V",
        "2GPYQPVR8", "2PJQ90PV", "9VRCUJQJ", "8YV0LYLG", "Q9GUUQY", "89PQ9LUL", "V20YJR09", "PJ9PLUG", "2QRC88L2",
        "2JQ2LVJL", "2R0VUY09", "GL9RPVCY", "QC08U8", "8G0208", "G09L2PPP", "JQ0PQQV2", "UP292J9", "9QPUU88",
        "2G8Y0PQV", "PUULRCPQ", "2YGV88", "YPRQGPGY", "YRUCGG9G", "2VLJGJ9L8", "9QPCGQJR", "8GLYYVQ", "R209G990",
        "2P80U8CQ", "P9QRL0PC", "2J8PG82YC", "CY2028Y0", "VR92Y8JJ", "8P2V0G9C", "288UP9G", "RJUPYCJ", "2VRQ0LQ8",
        "PQJVL0GY", "RLQGJ2GR", "8YQ20GG0", "2CRULLG0J", "2PLY0GC8G", "2P2PCYYPV", "990GYQG8", "9P20C9GC", "C8GC2QLL",
        "QGQYU9PR", "92G2VCGC", "L9992CYG", "9GPQP9GU", "PG9CG9", "2V9U899U"
    );

    $test2 = array('9VP98JGG', 'P8RV99Q0');

    $tags = array("9VP98JGG", "8PJ2UJ8");

    $players = $api->getPlayer($tags);
//    $players = $api->getPlayer($test);
//    $players = $api->getPlayer($test2);

//    d($players);

    foreach ($players as $player) {


        $tag      = $player->getTag();
        $name     = $player->getName();
        $trophies = $player->getTrophies();
        $rank     = $player->getRank();
        $role     = $player->getRole();
        $deckLink = $player->getDeckLink();


        echo "<br><b>PLAYER INFO </b><br>";
        d(
            $tag,
            $name,
            $trophies,
            $rank,
            $role,
            $deckLink
        );


        /**
         *  Arena object
         * @method    string              getName()                         Returns the name of the Arena.
         * @method    string              getArena()                        Returns the title of the Arena.
         * @method    int                 getArenaID()                      Returns the id of the Arena.
         * @method    int                 getTrophyLimit()                  Returns the trophyes limit to reach to the arena.
         *
         *
         * @method    array               getMaxDonationCount()             Returns the max donation per card type
         * @method    array               getConstant()                     Returns the Arena object constants
         */
        $arena                 = $player->getArena();
        $arenaName             = $arena->getName();
        $arenaTitle            = $arena->getArena();
        $arenaArenaID          = $arena->getArenaID();
        $arenaTrophyLimit      = $arena->getTrophyLimit();
        $arenaMaxDonationCount = $arena->getMaxDonationCount();
        echo "<br><b>PLAYER ARENA INFO </b><br>";
        d(
            $arenaName,
            $arenaTitle,
            $arenaArenaID,
            $arenaTrophyLimit,
            $arenaMaxDonationCount
        );


        $clan          = $player->getClan();
        $clanTag       = $clan->getTag();
        $clanName      = $clan->getName();
        $clanRole      = $clan->getRole();
        $clanDonations = $clan->getDonations();
        echo "<br><b>PLAYER CLAN INFO </b><br>";
        d(
            $clanTag,
            $clanName,
            $clanRole,
            $clanDonations
        );

        $clanBadge = $clan->getBadge();

        if ($clanBadge) {
            $clanBadgeId       = $clanBadge->getId();
            $clanBadgeName     = $clanBadge->getName();
            $clanBadgeCategory = $clanBadge->getCategory();
            $clanBadgeImage    = $clanBadge->getImage();
            echo "<br><b>PLAYER CLAN BADGE INFO </b><br>";
            d(
                $clanBadgeId,
                $clanBadgeName,
                $clanBadgeCategory,
                $clanBadgeImage
            );
        }

        $stats              = $player->getStats();
        $tournamentCardsWon = $stats->getTournamentCardsWon();
        $maxTrophies        = $stats->getMaxTrophies();
        $threeCrownWins     = $stats->getThreeCrownWins();
        $cardsFound         = $stats->getCardsFound();
        $totalDonations     = $stats->getTotalDonations();
        $challengeMaxWins   = $stats->getChallengeMaxWins();
        $challengeCardsWon  = $stats->getChallengeCardsWon();
        $level              = $stats->getLevel();
        echo "<br><b>PLAYER STATS </b><br>";

        d(
            $tournamentCardsWon,
            $maxTrophies,
            $threeCrownWins,
            $cardsFound,
            $totalDonations,
            $challengeMaxWins,
            $challengeCardsWon,
            $level
        );

        $favoriteCard                   = $stats->getFavoriteCard();
        $favoriteCardName               = $favoriteCard->getName();
        $favoriteCardKey                = $favoriteCard->getKey();
        $favoriteCardLevel              = $favoriteCard->getLevel();
        $favoriteCardMaxLevel           = $favoriteCard->getMaxLevel();
        $favoriteCardCount              = $favoriteCard->getCount();
        $favoriteCardRequiredForUpgrade = $favoriteCard->getRequiredForUpgrade();
        $favoriteCardLeftToUpgrade      = $favoriteCard->getLeftToUpgrade();
        $favoriteCardIcon               = $favoriteCard->getIcon();
        $favoriteCardElixir             = $favoriteCard->getElixir();
        $favoriteCardType               = $favoriteCard->getType();
        $favoriteCardRarity             = $favoriteCard->getRarity();
        $favoriteCardArena              = $favoriteCard->getArena();
        $favoriteCardDescription        = $favoriteCard->getDescription();
        $favoriteCardId                 = $favoriteCard->getId();
        $favoriteCardUpgradeExp         = $favoriteCard->getUpgradeExp();
        $favoriteCardUpgradeCost        = $favoriteCard->getUpgradeCost();
        $favoriteCardUpgradeStats       = $favoriteCard->getUpgradeStats();

        echo "<br><b>PLAYER FAVORITE CARD </b><br>";
        d(
            $favoriteCardName,
            $favoriteCardKey,
            $favoriteCardLevel,
            $favoriteCardMaxLevel,
            $favoriteCardCount,
            $favoriteCardRequiredForUpgrade,
            $favoriteCardLeftToUpgrade,
            $favoriteCardIcon,
            $favoriteCardElixir,
            $favoriteCardType,
            $favoriteCardRarity,
            $favoriteCardArena,
            $favoriteCardDescription,
            $favoriteCardId,
            $favoriteCardUpgradeExp,
            $favoriteCardUpgradeCost,
            $favoriteCardUpgradeStats
        );


        echo "<br><b>PLAYER DECK INFO </b><br>";

        foreach ($player->getCurrentDeck() as $card) {
            d(
                $card->getId(),
                $card->getName(),
                $card->getKey(),
                $card->getLevel(),
                $card->getMaxLevel(),
                $card->getCount(),
                $card->getRequiredForUpgrade(),
                $card->getLeftToUpgrade(),
                $card->getIcon(),
                $card->getElixir(),
                $card->getType(),
                $card->getRarity(),
                $card->getArena(),
                $card->getDescription(),
                $card->getUpgradeCost(),
                $card->getUpgradeExp(),
                $card->getUpgradeStats()
            );
        }

        echo "<br><b>PLAYER CARDS INFO </b><br>";

        foreach ($player->getCards() as $key => $card) {
            d(
                $key,
                $card->getId(),
                $card->getName(),
                $card->getKey(),
                $card->getLevel(),
                $card->getMaxLevel(),
                $card->getCount(),
                $card->getRequiredForUpgrade(),
                $card->getLeftToUpgrade(),
                $card->getIcon(),
                $card->getElixir(),
                $card->getType(),
                $card->getRarity(),
                $card->getArena(),
                $card->getDescription(),
                $card->getUpgradeCost(),
                $card->getUpgradeExp(),
                $card->getUpgradeStats()
            );
        }
        echo "<br><b>=====================================================================</b><br><br><br><br>";

    }
} catch (\Exception $e) {
    d($e);
}
