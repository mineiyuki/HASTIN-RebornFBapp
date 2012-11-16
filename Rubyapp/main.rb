# encoding: utf-8

require 'haml'
require 'rubygems'
require 'sinatra'


get '/result' do

  @type= "冷静沈着"
  @explain= "常に冷静で物事を俯瞰しているあなたはまさに冷静沈着と言えるでしょう。"

  haml :result

end
