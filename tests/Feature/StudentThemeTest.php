<?php

namespace Tests\Feature;

use Tests\TestCase;

class StudentThemeTest extends TestCase
{
    public function test_project_loads_the_distinct_student_template(): void
    {
        $path = public_path('css/student-theme.css');

        $this->assertFileExists($path);
        $css = file_get_contents($path);
        $this->assertStringContainsString('theme-signature: '.config('student.theme_slug'), $css);
        $this->assertStringContainsString('--student-primary:', $css);
        $this->assertNotEmpty(config('student.full_name_th'));

        $this->get('/')
            ->assertOk()
            ->assertSee('css/student-theme.css', false)
            ->assertSee('data-student-template="'.config('student.theme_slug').'"', false);
    }
}
