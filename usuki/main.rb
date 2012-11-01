require 'haml'
require 'sinatra'

get '/' do
  haml :index
end

post '/result' do
  puts params[:quiz1]
  haml :result
end
