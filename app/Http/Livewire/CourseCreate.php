<?php

namespace App\Http\Livewire;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\Course;
use Livewire\Component;
use App\Models\Curriculum;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $image;
    public $price;

    public $selectedDays = [];

    public $time;
    public $end_date;

    public $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ];

    protected $rules = [
        'name' => 'required|unique:courses,name',
        'description' => 'required',
        'price' => 'required',
        'selectedDays' => 'required',
        'time' => 'required',
        'end_date' => 'required'
    ];

    public function render()
    {
        return view('livewire.course-create');
    }

    public function formSubmit() {
        $this->validate();

        $course = Course::create([
            'name' => $this->name,
            'slug' => strtolower(str_replace(' ', '-', $this->name)),
            'description' => $this->description,
            'image' => $this->image,
            'price' => $this->price,
            'user_id' => auth()->user()->id,
        ]);

        // check how many sunday available
        $i = 1;
        $start_date = new DateTime(Carbon::now());
        $endDate =   new DateTime($this->end_date);
        $interval =  new DateInterval('P1D');
        $date_range = new DatePeriod($start_date, $interval, $endDate);
        //var_dump($date_range);
        foreach ($date_range as $date) {
            foreach ($this->selectedDays as $day) {
                if ($date->format("l") === $day) {
                    Curriculum::create([
                        'name' => $this->name . ' #' . $i++,
                        'week_day' => $day,
                        'class_time' => $this->time,
                        'class_date' => $date->format("Y-m-d"),
                        'course_id' => $course->id,
                    ]);
                }
            }
        }
        $i++;

        flash()->addSuccess('Course created successfully');

        return redirect()->route('course.index');
    }
}
