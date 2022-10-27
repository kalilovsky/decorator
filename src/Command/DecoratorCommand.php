<?php

namespace App\Command;

use App\Classes\Gout\Chocolat;
use App\Classes\Gout\Gout;
use App\Classes\Gout\Vannile;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'decorator',
    description: 'Add a short description for your command',
)]
class DecoratorCommand extends Command
{
    const DESSERT_CHOICES = [
        'Vanille',
        'Chocolat',
        'Fraise',
        'Pistache'
    ];

    public function __construct( private Chocolat $vannile)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $t = new Vannile();
        $t = new Chocolat($t);
        $helper = $this->getHelper('question');

        $question = new ChoiceQuestion(
            'Choisissez votre glace :',
            // choices can also be PHP objects that implement __toString() method
            self::DESSERT_CHOICES,

        );
        $question->setMultiselect(true);
        $question->setErrorMessage('Color %s is invalid.');

        $color = $helper->ask($input, $output, $question);
        $output->writeln('You have just selected: '. implode(',',$color));

        return Command::SUCCESS;
    }

    private function getDessertChoices(): string
    {
        $result = '';
        foreach (self::DESSERT_CHOICES as $key => $dessert){
            $result .= ($key + 1) . '-' . $dessert . PHP_EOL;
        }

        return $result;
    }
}
