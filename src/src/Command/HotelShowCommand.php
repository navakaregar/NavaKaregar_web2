<?php

namespace App\Command;

use App\Repository\HotelRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:hotel:show',
    description: 'table of hotel owners and their hotels',
)]
class HotelShowCommand extends Command
{
    private $hotelRepository;

    /**
     * @param string|null $name
     * @param HotelRepository $hotelRepository
     */
    public function __construct(string $name = null,HotelRepository $hotelRepository)
    {
        parent::__construct($name);
        $this->hotelRepository=$hotelRepository;
    }

    protected function configure(): void
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->table(["manager_id","hotel"]);
        $result = $this->hotelRepository->createQueryBuilder("h")
            ->select("manager_id")
            ->addSelect("name")
            ->getQuery()
            ->getArrayResult();
        $result=$result[0];
        $io->table(["manager_id","hotel"],[
            $result["manager_id"],
            $result["name"]

        ]);
        return Command::SUCCESS;
    }
}
