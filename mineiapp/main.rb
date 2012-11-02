# -*- coding: utf-8 -*-

require 'sinatra'
require 'haml'

get '/' do
  haml :index
end

post '/' do
  # 入力値を数値として集計する
  @string = params[:question1].to_i
  @string += params[:question2].to_i

  # 出力テキストを配列に入れる
  @textarray = Array[]
  @textarray[11] = "あなたはMの性質があります。ぜひポッキーを入れてもらって下さい"
  @textarray[12] = "女装露出プレイが相性抜群！"
  @textarray[21] = "ポッキーはAにいれたちんぽの比喩です。そんなあなたにはAFがぴったり！"
  @textarray[22] = "あなたは鑑賞会を開くと幸せになれるタイプです"

  @result = @textarray[@string]

  haml :result
end
