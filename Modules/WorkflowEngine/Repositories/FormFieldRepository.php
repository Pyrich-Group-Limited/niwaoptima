<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\FormField;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class FormFieldRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'form_id',
        'field_name',
        'field_type_id',
        'field_label',
        'field_options',
        'is_required'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return FormField::class;
    }

    /**
     * Find model record for given form id and field name
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function findByFormIdAndFieldName(int $form_id, string $field_name)
    {
        $query = $this->model->newQuery();

        return $query->where('form_id', $form_id)->where('field_name', $field_name)->first();
    }
}
