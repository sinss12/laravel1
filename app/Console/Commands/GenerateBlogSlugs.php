<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Blog;
use Illuminate\Support\Str;

class GenerateBlogSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-blog-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for existing blog.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $blog = Blog::whereNull('slug')->orWhere('slug', '')->get();

        if ($blog->isEmpty()) {
            $this->info('No blog found without a slug.');
            return Command::SUCCESS;
        }

        $this->info('Generating slugs for ' . $blog->count() . ' blog...');

                $this->info('All slugs generated successfully!');

        

        $this->info('All slugs generated successfully!');

        return Command::SUCCESS;
    }
}