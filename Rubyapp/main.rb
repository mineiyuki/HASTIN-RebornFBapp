# encoding: utf-8

require 'haml'
require 'rubygems'
require 'sinatra'

get '/question' do

  @q1 = "どちらが好きですか？"
  @a1 = "mountain"
  @a2 = "ocean"

  haml :question

end


post '/result' do

  
  @type= "冷静沈着"
  @explain= "常に冷静で物事を俯瞰しているあなたはまさに冷静沈着と言えるでしょう。"

  @type= params[:first]
  @explain= params[:first]

  haml :result

end
