using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Spotifa
{
    #region Artists
    public class Artists
    {
        #region Member Variables
        protected int _id_artist;
        protected string _name;
        protected string _gender;
        protected unknown _age;
        #endregion
        #region Constructors
        public Artists() { }
        public Artists(string name, string gender, unknown age)
        {
            this._name=name;
            this._gender=gender;
            this._age=age;
        }
        #endregion
        #region Public Properties
        public virtual int Id_artist
        {
            get {return _id_artist;}
            set {_id_artist=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual string Gender
        {
            get {return _gender;}
            set {_gender=value;}
        }
        public virtual unknown Age
        {
            get {return _age;}
            set {_age=value;}
        }
        #endregion
    }
    #endregion
}