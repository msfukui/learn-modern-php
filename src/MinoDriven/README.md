# Mino Driven

ミノ駆動さんの「良いコード/悪いコードで学ぶ設計入門 保守しやすい成長し続けるコードの書き方」の気になるコードを写経してみたものです.

## 写経した章の説明

### 7.2 継承による関心の混在

MixingConcernsWithInheritance/

継承よりも委譲の方が依存関係をコントロールしやすい、という点は理解した上で、継承元の変更を局所的にすれば問題ないのでは、という検証をしたくて書いてみました.  
（つまり挙げられている例があまり良くなさそうな気がする）

### 15.1 リファクタリングの流れ

RefactoringFlow/

### 15.2 安全にリファクタリングする方法

SafetyRefactoring/

DeliverCharge::deliverCharge() のインタフェースをリファクタリング中に変更しているけれど、これだとこのタイミングで呼び出し元を全てまとめて変更する必要があって、安全ではないのでは? という気持ちになりました.  
(例えば別メソッドを作ってそちらに置き換えていく対応の方が現実的では)
