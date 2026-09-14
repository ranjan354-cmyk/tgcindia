  <div class="col-md-12"><p><b>Body Font</b></p></div>
 <hr>
 <div class="col-md-6">
                     <label>Theme font Family</label>
                     
                    <select class="form-control" id="theme_font">
                        <option value="">--Select Family---</option>
                        @foreach($fontfamily as $fontfamilyValue)
                        <option value="{{$fontfamilyValue->font_name}}" @if($setting->theme_font==$fontfamilyValue->font_name) selected @endif>{{$fontfamilyValue->font_name}}</option>
                        @endforeach
                    </select> 
                  
                 </div>
                 
                  <div class="col-md-6">
                     <label>Theme font Weight</label>
                     
                     <select class="form-control" id="theme_font_weight">
                        <option value="">--Select Font Weight---</option>
                        @foreach($fontweight as $fontValue)
                        <option value="{{$fontValue->font_weight_value}}" @if($setting->theme_font_weight==$fontValue->font_weight_value) selected @endif>{{$fontValue->font_weight_value}} {{$fontValue->font_name}}</option>
                        @endforeach
                    </select> 
                  
                 </div>
                 
           <br>   <br>         
                  <div class="col-md-12" style="margin-too:20px;"><p style="margin-top: 50px;"><b>Heading Font</b></p></div>

 <div class="col-md-3">
                     <label>font Family</label>
                     
                    <select class="form-control" id="heading_font_family">
                        <option value="">--Select Family---</option>
                        @foreach($fontfamily as $fontfamilyValue)
                        <option value="{{$fontfamilyValue->font_name}}" @if($setting->heading_font_family==$fontfamilyValue->font_name) selected @endif>{{$fontfamilyValue->font_name}}</option>
                        @endforeach
                    </select> 
                  
                 </div>
                 
                  <div class="col-md-3">
                     <label>Theme font Weight</label>
                     
                     <select class="form-control" id="heading_font_weight">
                        <option value="">--Select Font Weight---</option>
                        @foreach($fontweight as $fontValue)
                        <option value="{{$fontValue->font_weight_value}}" @if($setting->heading_font_weight==$fontValue->font_weight_value) selected @endif>{{$fontValue->font_weight_value}} {{$fontValue->font_name}}</option>
                        @endforeach
                    </select> 
                  
                 </div>
                  <div class="col-md-3">
                     <label>Font Size(in px)</label>
                     
                  <input type="text" class="form-control" id="heading_font_size" placeholder="Font Size" value="{{$setting->heading_font_size}}">
                  
                 </div>
                 
                  <div class="col-md-3">
                     <label>Font Spacing(in px)</label>
                      <input type="text" class="form-control" id="heading_font_space" placeholder="Font Spacing" value="{{$setting->heading_font_space}}">
                   
                  
                 </div>
                 
                 
                   <br>   <br>         
                  <div class="col-md-12" style="margin-too:20px;"><p style="margin-top: 50px;"><b>Sub Heading Font</b></p></div>

 <div class="col-md-3">
                     <label>font Family</label>
                     
                    <select class="form-control" id="sub_heading_font">
                        <option value="">--Select Family---</option>
                        @foreach($fontfamily as $fontfamilyValue)
                        <option value="{{$fontfamilyValue->font_name}}" @if($setting->sub_heading_font==$fontfamilyValue->font_name) selected @endif>{{$fontfamilyValue->font_name}}</option>
                        @endforeach
                    </select> 
                  
                 </div>
                 
                  <div class="col-md-3">
                     <label>font Weight</label>
                     
                     <select class="form-control" id="sub_heading_font_weight">
                        <option value="">--Select Font Weight---</option>
                        @foreach($fontweight as $fontValue)
                        <option value="{{$fontValue->font_weight_value}}" @if($setting->sub_heading_font_weight==$fontValue->font_weight_value) selected @endif>{{$fontValue->font_weight_value}} {{$fontValue->font_name}}</option>
                        @endforeach
                    </select> 
                  
                 </div>
                 
                  <div class="col-md-3">
                     <label>Font Size(in px)</label>
                     
                  <input type="text" class="form-control" id="sub_heading_font_size" placeholder="Font Size" value="{{$setting->sub_heading_font_size}}">
                  
                 </div>
                 
                  <div class="col-md-3">
                     <label>Font Spacing(in px)</label>
                      <input type="text" class="form-control" id="sub_heading_font_space" placeholder="Font Spacing" value="{{$setting->sub_heading_font_space}}">
                   
                  
                 </div>
                 
                 
                    <br>   <br>         
                  <div class="col-md-12" style="margin-too:20px;"><p style="margin-top: 50px;"><b>Paragraph & Small Font Size & Spacing</b></p></div>

 <div class="col-md-6">
                     <label>Font Size(in px)</label>
                     
                  <input type="text" class="form-control" id="pragaraph_font_size" placeholder="Font Size" value="{{$setting->pragaraph_font_size}}">
                  
                 </div>
                 
                  <div class="col-md-6">
                     <label>Font Spacing(in px)</label>
                      <input type="text" class="form-control" id="paragraph_space" placeholder="Font Spacing" value="{{$setting->paragraph_space}}">
                   
                  
                 </div>