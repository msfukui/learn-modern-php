# Seven In Row 「七並べ」の実装

OOC 2024 のノベルティグッズとして提供されたクラス図を元に PHP で実装してみたものです

## Glossary 用語集

| 用語    | 用語(英名) | 説明                                                  |
|-------|--------|-----------------------------------------------------|
| スート   | Suit   | トランプカードのマークのことです。<br>スペード、ハート、ダイヤ、クラブの 4 種類が存在します。  |
| ランク   | Rank   | トランプカードの数字および AJQK のことです。<br>13 種類のランクがあります。        |
| 場     | Field  | プレイヤーが七並べのカードを出すところです。                              |
| 列     | Column | カードがスートごとに分類されるルールを適用するためのものです。                     |
| プレイヤー | Player | 七並べのゲームの参加者のことです。                                   |
| カード   | Card   | トランプのカードのことです。<br>スートごとに 13 枚のカードがあり、全部で 52 枚となります。 |

## クラス図

```mermaid
classDiagram
    Player "1" -- "0..*" UnreleasedCard : "has"
    Card <|-- UnreleasedCard
    Card <|-- ReleasedCard
    Field o-- Row
    Row "0..1" -- "1" ReleasedCard
    Row "1" o-- "1..13" ReleasedCard
    Row "0..1" -- "1" ReleasedCard
    class Card {
      Suit
      Rank
    }
    class Row {
      Suit
    }
    class KindOfSuit {
        <<enumeration>>
        SPADE
        HEART
        DIAMOND
        CLUB
    }
    class KindOfRank {
        <<enumeration>>
        ACE
        TWO
        THREE
        FOUR
        FIVE
        SIX
        SEVEN
        EIGHT
        NINE
        TEN
        JACK
        QUEEN
        KING
    }
```

## Reference Link 参考リンク

* mermaid 記法のクラス図の書き方
    https://github.com/mermaidjs/mermaidjs.github.io/blob/master/classDiagram.md
