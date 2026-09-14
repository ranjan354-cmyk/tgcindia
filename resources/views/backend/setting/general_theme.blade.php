
 <div class="col-md-6">
                     <label>Theme bg</label>
                     <input type="text" class="form-control" name="theme_bg" placeholder="Theme bg" id="theme_bg" value="{{$setting->theme_bg}}">
                 </div>
                 
                  <div class="col-md-6">
                     <label>Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="">--Select Status--</option>
                       <option value="1" {{ $setting->status == 1 ? 'selected' : '' }}>Active</option>
<option value="0" {{ $setting->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                 </div>
                