<?php

use Gilanggustina\ModuleLabRadiology\Models\LabRadiology\Laboratorium\{
    Sampling\SamplingLaboratory,
    Sampling\Sampling,
    Laboratorium
};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hanafalah\LaravelSupport\Concerns\NowYouSeeMe;

return new class extends Migration
{
    use NowYouSeeMe;
    private $__table, $__table_laboratory, $__table_sampling;

    public function __construct()
    {
        $this->__table = app(config('database.models.SamplingLaboratory', SamplingLaboratory::class));
        $this->__table_laboratory = app(config('database.models.Laboratory', Laboratorium::class));
        $this->__table_sampling = app(config('database.models.Sampling', Sampling::class));
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $table_name = $this->__table->getTable();
        if (!$this->isTableExists()) {
            Schema::create($table_name, function (Blueprint $table) {
                $table->id();
                $table->string('name', 255)->nullable(false);
                $table->json('props')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table($table_name, function (Blueprint $table) {
                $table->foreignIdFor($this->__table_laboratory::class, 'laboratorium_id')
                    ->nullable()->after('id')
                    ->index()->constrained()
                    ->cascadeOnUpdate()->restrictOnDelete();
                $table->foreignIdFor($this->__table_sampling::class, 'sampling_id')
                    ->nullable()->after('id')
                    ->index()->constrained()
                    ->cascadeOnUpdate()->restrictOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->__table->getTable());
    }
};
