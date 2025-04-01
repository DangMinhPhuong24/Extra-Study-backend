<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $quantity = (double) $this->register->quantity;
        $registeredQuantity = (double) $this->register->registered_quantity;
        
        return [
            'id' => $this->id,
            'student_name' => $this->user->name ?? null,
            'register_id' => $this->register_id,
            'subject_id' => $this->register->subject_id ?? null,
            'code' => $this->register->subject->code ?? null,
            'subject_name' => $this->register->subject->subject_name ?? null,
            'class_name' => $this->register->class_name ?? null,
            'quantity' => $quantity,
            'remaining_quantity' => $quantity - $registeredQuantity,
            'study_time_id' => $this->register->study_time_id ?? null,
            'teacher_name' => $this->register->studyTime->user->name ?? null,
            'weekday' => $this->register->studyTime->weekday ?? null,
            'from_hour' => $this->register->studyTime->from_hour ?? null,
            'to_hour' => $this->register->studyTime->to_hour ?? null,
            'from_date' => format_date($this->register->studyTime->from_date) ?? null,
            'to_date' => format_date($this->register->studyTime->to_date) ?? null
        ];
    }
}
