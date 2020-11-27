<?php

class schedules
{
    public $kromosom;
    public $fitness;
    public $kombinasi;

    // fungsi utama genetika
    public function main($besar_populasi, $mutation_rate, $generasi, $data)
    {

        for ($i = 0; $i < $generasi; $i++) {

            $this->_population($besar_populasi, $data);

            // melakukan seleksi kromosom
            [$parent1, $parent2] = $this->selection();

            // crossover
            [$offspring1, $offspring2] = $this->crossover($parent1, $parent2);

            // mutation
            $mutant1 = $this->mutation($offspring1, $mutation_rate, $data);
            $mutant2 = $this->mutation($offspring2, $mutation_rate, $data);
            $this->regeneration($parent1, $parent2, $mutant1, $mutant2);

            $this->terminasi();
        }
        $index = array_search(min($this->fitness), $this->fitness);
        return $this->kromosom[$index];
    }

    // menyatukan setiap individu menjadi satu kesatuan
    private function _individus($data)
    {
        for ($i = 0; $i < $this->kombinasi; $i++) {
            $this->individus[$i] = $this->_individu($data);
        }
        return $this->individus;
    }

    // fungsi generate individu
    private function _individu($data)
    {
        $individu = [];
        for ($i = 0; $i < $data['sesi']; $i++) {
            for ($j = 0; $j < $data['guru_mapel']; $j++) {
                for ($k = 0; $k < $data['ruang']; $k++) {
                    for ($l = 0; $l < $data['kelas']; $l++) {
                        $individu = [rand(0, $i), rand(0, $j), rand(0, $k), rand(0, $l)];
                    }
                }
            }
        }
        return $individu;
    }

    // fungsi menghitung nilai fitness
    private function _calc_fitness($kromosom, $tipe)
    {
        if ($tipe == "all") {

            $penalty = 0;
            for ($i = 0; $i < $this->kombinasi; $i++) {

                // iterasi sesi guru mapel
                for ($k = 0; $k < $this->kombinasi; $k++) {

                    if (isset($kromosom[$k + 1])) {
                        $l = $k + 1;
                    }
                    // cek kesamaan sesi dan guru mapel
                    if ($kromosom[$k][0] == $kromosom[$l][0] && $kromosom[$k][1] == $kromosom[$l][1]) {
                        $penalty++;
                    }

                    // cek kesamaan sesi dan ruang
                    if ($kromosom[$k][0] == $kromosom[$l][0] && $kromosom[$k][2] == $kromosom[$l][2]) {
                        $penalty++;
                    }

                    if (isset($kromosom[$k + 1])) {
                        $l = $k + 1;
                    }
                    // cek kesamaan sesi dan kelas
                    if ($kromosom[$k][0] == $kromosom[$l][0] && $kromosom[$k][3] == $kromosom[$l][3]) {
                        $penalty++;
                    }
                }
            }
            $fitness = ($this->kombinasi / $penalty) * 100;
            return round($fitness);
        } else {
            $penalty = 0;
            // iterasi inti / iterasi per kromosom
            for ($i = 0; $i < count($kromosom); $i++) {
                // iterasi sesi guru mapel
                for ($k = 0; $k < count($kromosom); $k++) {

                    if (isset($kromosom[$k + 1])) {
                        $l = $k + 1;
                    }
                    // cek kesamaan sesi dan guru mapel
                    if ($kromosom[$k][0] == $kromosom[$l][0] && $kromosom[$k][1] == $kromosom[$l][1]) {
                        $penalty++;
                    }

                    // cek kesamaan sesi dan ruang
                    if ($kromosom[$k][0] == $kromosom[$l][0] && $kromosom[$k][2] == $kromosom[$l][2]) {
                        $penalty++;
                    }

                    // cek kesamaan sesi dan kelas
                    if ($kromosom[$k][0] == $kromosom[$l][0] && $kromosom[$k][3] == $kromosom[$l][3]) {
                        $penalty++;
                    }
                }
            }
            $fitness = ($this->kombinasi / $penalty) * 100;
            return round($fitness);
        }
    }

    // Fungsi membentuk populasi
    private function _population($besar_populasi, $data)
    {
        // menghitung banyak kombinasi 
        $this->kombinasi = ($data['sesi'] * $data['guru_mapel'] * $data['ruang'] * $data['kelas']);

        // memanggil fungsi generate banyak individu
        for ($i = 0; $i < $besar_populasi; $i++) {
            $this->kromosom[$i] = $this->_individus($data);
            $this->fitness[$i] = $this->_calc_fitness($this->individus, "all");
        }
    }

    // seleksi menggunakan tournament / low fitness
    public function selection()
    {
        $index1 = array_search(min($this->fitness), $this->fitness);
        $parent1 = [$this->fitness[$index1], $this->kromosom[$index1]];
        array_splice($this->kromosom, $index1, 1);
        array_splice($this->fitness, $index1, 1);

        $index2 = array_search(min($this->fitness), $this->fitness);
        $parent2 = [$this->fitness[$index2], $this->kromosom[$index2]];
        array_splice($this->kromosom, $index2, 1);
        array_splice($this->fitness, $index2, 1);

        return [$parent1, $parent2];
    }

    // crossover one point
    public function crossover($parent1, $parent2)
    {

        $length =  count($parent1[1]) / 2;
        $tail = array_splice($parent1[1], $length, $length);
        $head = array_splice($parent2[1], 0, $length);
        $offspring1 = array_merge($parent1[1], $head);
        $offspring2 = array_merge($tail, $parent2[1]);
        return [$offspring1, $offspring2];
    }

    // mutation 
    public function mutation($offspring, $mutation_rate, $data)
    {

        for ($i = 0; $i < count($offspring); $i++) {
            if (rand(0, 10) / 10 <= $mutation_rate) {
                // mutasi sesi 
                for ($x = 0; $x < $data['sesi']; $x++) {
                    // muasi guru_mapel
                    for ($j = 0; $j < $data['guru_mapel']; $j++) {
                        $offspring[$i] = [rand(0, $x), rand(0, $j), $offspring[$i][2], $offspring[$i][3]];
                    }
                }
            }
        }

        return [
            $this->_calc_fitness($offspring, "not_all"),
            $offspring
        ];
    }

    // fungsi regenerasi
    public function regeneration($parent1, $parent2, $mutant1, $mutant2)
    {
        // seleksi kembali 2 kromosom lemah
        for ($i = 1; $i <= 2; $i++) {
            $index = array_search(min($this->fitness), $this->fitness);
            array_splice($this->fitness, $index, 1);
            array_splice($this->kromosom, $index, 1);
        }

        $n = count($this->fitness);

        // kromosom parent1
        $this->fitness[$n] = $parent1[0];
        $this->kromosom[$n] = $parent1[1];

        // kromosom parent 2
        $this->fitness[$n + 1] = $parent2[0];
        $this->kromosom[$n + 1] = $parent2[1];

        $n = count($this->fitness);

        // mutant1
        $this->fitness[$n] = $mutant1[0];
        $this->kromosom[$n] = $mutant1[1];

        // mutant2
        $this->fitness[$n + 1] = $mutant2[0];
        $this->kromosom[$n + 1] = $mutant2[1];
    }

    // funsgi terminasi 
    public function terminasi()
    {
        $index = array_search(min($this->fitness), $this->fitness);
        if ($this->fitness[$index] == 0) {
            return $this->kromosom[$index];
        }
    }
};
