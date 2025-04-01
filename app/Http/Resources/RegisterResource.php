<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $quantity = (double) $this->quantity;
        $registeredQuantity = (double) $this->registered_quantity;

        return [
            'id' => $this->id,
            'subject_id' => $this->subject_id,
            'code' => $this->subject->code ?? null,
            'subject_name' => $this->subject->subject_name ?? null,
            'class_name' => $this->class_name,
            'quantity' => $quantity,
            'remaining_quantity' => $quantity - $registeredQuantity,
            'study_time_id' => $this->study_time_id,
            'teacher_id' => $this->studyTime->user_id ?? null,
            'teacher_name' => $this->studyTime->user->name ?? null,
            'weekday' => $this->studyTime->weekday ?? null,
            'from_hour' => $this->studyTime->from_hour ?? null,
            'to_hour' => $this->studyTime->to_hour ?? null,
            'from_date' => format_date($this->studyTime->from_date) ?? null,
            'to_date' => format_date($this->studyTime->to_date) ?? null
        ];
    }
}
