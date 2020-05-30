<?php 

namespace App\Services\Html;

class HtmlBuilder extends \Collective\Html\FormBuilder {

    public function btnCreate($url = null) {
        return '<a href="'.$url.'" class="btn btn-success btn-sm shadow-sm px-4 rounded"><i class="fas fa-plus"></i> Create</a>';
    }

    public function btnView($url = null) {
        return '<a href="'.$url.'" class="btn btn-info btn-sm shadow-sm px-4 rounded"><i class="far fa-eye"></i> View</a>';
    }
    
    public function btnEdit($url = null) {
        return '<a href="'.$url.'" class="btn btn-secondary btn-sm shadow-sm px-4 rounded"><i class="far fa-edit"></i> Edit</a>';
    }

    public function btnDelete($url = null) {
        return '<button class="btn btn-danger btn-sm shadow-sm px-4 rounded" id="delete"><i class="far fa-trash-alt"></i> Delete</button>';
    }

    public function btnBack($url = null) {
        return '<a href="'.$url.'" class="btn btn-primary btn-sm shadow-sm px-4 rounded"><i class="fas fa-reply"></i> Back</a>';
    }

    public function btnUpload($url = null) {
        return '<a href="'.$url.'" class="btn btn-info btn-sm shadow-sm px-4 rounded"><i class="fas fa-cloud-upload-alt"></i> Upload</a>';
    }

    public function btnOpen($url = null, $text = 'Open In Website') {
        return '<a href="'.$url.'" target="_blank" class="ml-2 btn btn-info btn-sm shadow-sm px-4 rounde">
                    <i class="fas fa-external-link-alt"></i> '.$text.'
                </a>';
    }

    public function btnSave() {
        return '
            <div class="row justify-content-end align-items-center">
            <div class="col-auto">
                <a href="'.url()->previous().'" class="text-muted">Cancel</a>
            </div>
            <div class="col-auto">
                <button class="btn btn-success btn-sm shadow-sm px-4 rounded" type="submit"><i class="far fa-save"></i> Save</button>
            </div>
        </div>
        ';
    }
}