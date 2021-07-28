      <div class="col-12 parent_div mt-3">
        <div class="d-flex align-items-stretch files_group">
          <div class="border border-success rounded p-3 flex-grow-1 mr-2">
            <label for="">Files / Images / Videos</label>
            <input type="file" class="form-control form-control-lg border-0 mt-2 ps-3" name="group_inputs[1][files][]" id="" multiple>

            <div class="form-group">
              <label for="">Type of File(s)</label>
              <select name="group_inputs[1][parent_category]" id="" class="form-control form-control-lg">
                @foreach ($parent_categories as $cat)
                  <option value="{{ $cat->id }}">{{ $cat->name}}</option>
                @endforeach
              </select>

              <div class="form-group mt-4">
                <label for="">Group of this files</label>
                <select name="group_inputs[1][child_category]" id="" class="form-control form-control-lg">
                  @foreach ($child_categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-success add_more_file_inputs" id="add_image_with_different_categories">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
              <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/>
            </svg>
          </button>
        </div>
      </div>