using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace TopTrumpsDnD
{
    public class Bass//52 spil, 8 flokkar
    {
        public string Tipa { get; private set; }
        public short ArmourClass { get; private set; }
        public short HitPoints { get; private set; }
        public short Strength { get; private set; }
        public short Intelligence { get; private set; }
        public short Dexterity { get; private set; }
        public short Wistom { get; private set; }
        public short Constitution { get; private set; }
        public short Charisma { get; private set; }
        public Bass(string tipa,short ac, short hp, short str, short intel, short dex, short wis, short con, short cha)
        {
            Tipa = tipa;
            ArmourClass = ac;
            HitPoints = hp;
            Strength = str;
            Intelligence = intel;
            Dexterity = dex;
            Wistom = wis;
            Constitution = con;
            Charisma = cha;
        }
        public override string ToString()
        {
            return Tipa + "\nMax Health: " + HitPoints + "\nArmour Class: " + ArmourClass + "\nStrength: " + Strength + "\nDexterity: " + Dexterity + "\nConstitution: " + Constitution + "\nIntelligence: " + Intelligence + "\nWistom: " + Wistom + "\nCharisma: " + Charisma;
        }
    }
    public class Player : Bass
    {
        public string Nafn { get; set; }
        public string Role { get; set; }
        public Player(string nafn,string role,string tipa, short ac, short hp, short str, short intel, short dex, short wis, short con, short cha)
            : base(tipa, ac, hp, str, intel, dex, wis, con, cha)
        {
            Nafn = nafn;
            Role = role;
        }
        public override string ToString()
        {
            return Nafn+" - "+Role+": "+base.ToString();
        }
    }
    public class LightNir : Player
    {
        public LightNir()
            : base("LightNir","Rogue/arcane trickster","Player",14,13,12,16,17,12,10,10){}
    }
    public class NoLeb : Player
    {
        public NoLeb()
            : base("NoLeb","Druid/Circle of Land","Player",10,15,17,13,9,17,13,10){}
    }
}
