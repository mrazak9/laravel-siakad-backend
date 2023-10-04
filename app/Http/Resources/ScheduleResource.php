<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'subject_id' => $this->subject_id,
            'schedule_date' => $this->schedule_date,
            'schedule_type' => $this->schedule_type,
            'subject' => [
                'id' => $this->subject->id,
                'title' => $this->subject->title,
                'lecturer_id' => $this->subject->lecturer_id,
                'lecturer' => [
                    'id' => $this->subject->lecturer->id,
                    'name' => $this->subject->lecturer->name,
                    'email' => $this->subject->lecturer->email,
                    'roles' => $this->subject->lecturer->roles,
                    'phone' => $this->subject->lecturer->phone,
                    'address' => $this->subject->lecturer->address,
                ],
            ],
            'student' => [
                'id' => $this->student->id,
                'name' => $this->student->name,
                'email' => $this->student->email,
                'roles' => $this->student->roles,
                'phone' => $this->student->phone,
                'address' => $this->student->address,
            ],
        ];
    }
}
